<?php
namespace App\Modules\Shisan\Database\Seeds;

use Illuminate\Database\Seeder;
Use DB, Eloquent, Model, Schema;

class RoomsSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
// 		DB::table('departments')->delete();
// 			$statement = "ALTER TABLE departments AUTO_INCREMENT = 1;";
// 			DB::unprepared($statement);
//		DB::table('rooms')->truncate();

		DB::table('rooms')->delete();
			$statement = "ALTER TABLE rooms AUTO_INCREMENT = 1;";
			DB::unprepared($statement);

		$csv = dirname(__FILE__) . '/data/' . 'rooms.csv';
		$file_handle = fopen($csv, "r");

		while (!feof($file_handle)) {

			$line = fgetcsv($file_handle);
			if (empty($line)) {
				continue; // skip blank lines
			}

//site_id,user_id,name,description,barcode


			$c = array();
			$c['site_id']			= $line[0];
			$c['user_id']			= $line[1];
			$c['name']				= $line[2];
//			$c['description']		= $line[3];
//			$c['barcode']			= $line[4];

			DB::table('rooms')->insert($c);
		}

		fclose($file_handle);

	}

}
