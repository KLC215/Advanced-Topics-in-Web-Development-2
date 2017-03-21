<?php
require 'Connection.php';
require 'XMLResponse.php';

class Restful
{
	private $db;
	private $xml;

	const DATE_FORMAT = "j F Y g:i";

	public function __construct()
	{
		$this->db = Connection::make();

		$this->xml = new XMLResponse();

		$this->checkRequest();
	}

	private function checkRequest()
	{
		if (isset($_REQUEST['amnt']) && isset($_REQUEST['from']) && isset($_REQUEST['to'])) {
			$this->convertCurrency([
				'amount' => $_REQUEST['amnt'],
				'from'   => $_REQUEST['from'],
				'to'     => $_REQUEST['to'],
			]);
		}

		if (isset($_REQUEST['method'])) {
			switch ($_REQUEST['method']) {
				case 'GET':
					$this->get($_REQUEST['code']);
					break;
				case 'POST':
					$this->post([
						'code' => $_REQUEST['code'],
						'curr' => $_REQUEST['curr'],
						'loc'  => $_REQUEST['loc'],
						'rate' => $_REQUEST['rate'],
					]);
					break;
				case 'PUT':
					$this->put([
						'code' => $_REQUEST['code'],
						'curr' => $_REQUEST['curr'],
						'loc'  => $_REQUEST['loc'],
						'rate' => $_REQUEST['rate'],
					]);
					break;
				case 'DELETE':
					$this->delete($_REQUEST['code']);
					break;
			}
		}

		$this->xml->responseError([
			'code'    => 1000,
			'message' => 'Missing Parameters!',
		]);
		die();
	}

	private function convertCurrency($request = [])
	{
		$result = $this->db->query(
			"SELECT *
				FROM currencies
				WHERE code IN ('{$request['from']}', '{$request['to']}');"
		);

		if (mysqli_num_rows($result) != 2) {
			$this->xml->responseError([
				'code'    => 1001,
				'message' => 'Currency Code does not exist!',
			]);
			die();
		}

		$data = [];

		while ($row = $result->fetch_assoc()) {
			if ($row['code'] == $request['from']) {
				$data[0] = $row;
			} else {
				$data[1] = $row;
			}
		}

		/**
		 *  0: from
		 *  1: to
		 */
		$rate = $data[1]['rate'] / $data[0]['rate'];

		$this->xml->responseConvertedCurrency('conv', $data, [
			'at'     => date(self::DATE_FORMAT),
			'rate'   => $rate,
			'amount' => $request['amount'],
		]);

	}

	private function get($code)
	{
		$result = $this->checkNotExistCode($code);

		$this->xml->responseCRUD(
			'get',
			$result->fetch_assoc(),
			date(self::DATE_FORMAT)
		);

	}

	private function post($data = [])
	{
		$this->checkExistingCode($data['code']);

		$this->db->query(
			"INSERT INTO currencies (code, curr, loc, rate)
			VALUES ('{$data['code']}', '{$data['curr']}', '{$data['loc']}', '{$data['rate']}');"
		);

		$this->xml->responseCRUD(
			'post',
			$data,
			date(self::DATE_FORMAT)
		);
	}

	private function put($data = [])
	{
		$result = $this->db->query(
			"SELECT * 
				FROM currencies
				WHERE code = '{$data['code']}';"
		);

		if (mysqli_num_rows($result) == 0) {
			$this->post($data);
		} else {

			$this->db->query(
				"UPDATE currencies
					SET curr = '{$data['curr']}', loc = '{$data['loc']}', rate = '{$data['rate']}'
					WHERE code = '{$data['code']}';"
			);

			$this->xml->responseCRUD(
				'put',
				$data,
				date(self::DATE_FORMAT)
			);
		}
	}

	private function delete($code)
	{
		$result = $this->checkNotExistCode($code);

		$this->db->query(
			"DELETE FROM currencies
				WHERE code = '$code';"
		);

		$this->xml->responseCRUD(
			'delete',
			$result->fetch_assoc(),
			date(self::DATE_FORMAT)
		);
	}

	private function checkExistingCode($code)
	{
		$result = $this->db->query(
			"SELECT * 
				FROM currencies
				WHERE code = '$code';"
		);

		if (mysqli_num_rows($result) > 0) {
			$this->xml->responseError([
				'code'    => 1002,
				'message' => 'Currency Code Exist!',
			]);
			die();
		}
	}

	private function checkNotExistCode($code)
	{
		$result = $this->db->query(
			"SELECT * 
				FROM currencies
				WHERE code = '$code';"
		);

		if (mysqli_num_rows($result) == 0) {
			$this->xml->responseError([
				'code'    => 1001,
				'message' => 'Currency Code does not exist!',
			]);
			die();
		}

		return $result;
	}

}