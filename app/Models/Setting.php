<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table = 'settings';
	protected $fillable = [
		'sitename_en',
		'phone_number',
		'phone_number_2',
		'phone_number_3',
		'email',
		'logo',
		'icon',
		'main_photo',
		'facebook',
		'youtube',
		'instagram',
		'twitter',
		'system_status',
		'system_message',
		'site_description',
		'theme_setting',
	];

}
