<?php


class XMLResponse
{
	private function xmlHeader($header)
	{
		header("Content-Type: text/xml");
		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo "<$header>\n";
	}

	private function xmlFooter($footer)
	{
		echo "</$footer>";
		exit();
	}

	public function responseConvertedCurrency($rootTag, $data = [], $extraTags = [])
	{
		$this->xmlHeader($rootTag);

		echo '<at>' . $extraTags['at'] . '</at>';
		echo '<rate>' . $extraTags['rate'] . '</rate>';

		for ($i = 0; $i < sizeof($data); $i++) {

			echo ($i == 0)
				? "<from>\n"
				: "<to>\n";

			foreach ($data[$i] as $key => $val) {
				if ($key == 'rate') {

					echo ($i == 0)
						? '<amnt>' . $extraTags['amount'] . '</amnt>'
						: '<amnt>' . $extraTags['amount'] * $extraTags['rate'] . '</amnt>';

				} else {

					echo '<' . $key . '>' . $val . '</' . $key . '>';

				}
			}

			echo ($i == 0)
				? "</from>\n"
				: "</to>\n";
		}

		$this->xmlFooter($rootTag);
	}

	public function responseCRUD($method, $data = [], $at)
	{
		$this->xmlHeader($method);

		echo '<at>' . $at . '</at>';

		foreach ($data as $key => $val) {
			echo '<' . $key . '>' . $val . '</' . $key . '>';
		}

		$this->xmlFooter($method);

	}

	public function responseError($msg = [])
	{
		$this->xmlHeader('conv');

		echo "<error no='{$msg['code']}'>" . $msg['message'] . "</error>";

		$this->xmlFooter('conv');
	}
}