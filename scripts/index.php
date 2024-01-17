<?php
$cities = [
	[
		'country_name' => 'USA',
		'country_code' => 'US',
		'city_name' => 'New York',
		'lat' => '40.7127753',
		'lng' => '-74.0059728',
	],
	[
		'country_name' => 'USA',
		'country_code' => 'US',
		'city_name' => 'Los Angeles',
		'lat' => '34.0522342',
		'lng' => '-118.2436849',
	],
	[
		'country_name' => 'Philippines',
		'country_code' => 'PH',
		'city_name' => 'Manila',
		'lat' => '14.5995124',
		'lng' => '120.9842195',
	],
	[
		'country_name' => 'Philippines',
		'country_code' => 'PH',
		'city_name' => 'Cebu',
		'lat' => '10.3156993',
		'lng' => '123.8854377',
	]
];

try {
	$directory = 'files';

	if (!is_dir($directory)) {
		if (!mkdir($directory, 0777, true)) {
			throw new Exception('Failed to create directory');
		}
	}

	$csv_file_path = $directory . '/cities.csv';
	$csv_file = fopen($csv_file_path, 'w');

	if (!$csv_file) {
		throw new Exception('Failed to open file');
	}

	fputcsv($csv_file, ['Country name', 'Country code', 'City name', 'Lat', 'Long']);

	foreach ($cities as $city) {
		fputcsv($csv_file, [
			$city['country_name'],
			$city['country_code'],
			$city['city_name'],
			$city['lat'],
			$city['lng'],
		]);
	}

	fclose($csv_file);

	echo 'ok';
} catch (Exception $exception) {
	echo $exception->getMessage();
}