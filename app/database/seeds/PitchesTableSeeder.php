<?php

class PitchesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pitches')->delete();
 
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '300000',
            'user_id' => 2,
            'company_name' => "Skype2",
            'allow_public' => false,            
        ));
 
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "BayRan",
            'allow_public' => true,
            ));

        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "Macrosoft",
            'allow_public' => true,
            ));

        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany1",
            'allow_public' => true,
            ));

        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany2",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany3",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany4",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany5",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany6",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany7",
            'allow_public' => true,
            ));
        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 2,
            'company_name' => "CoolCompany8",
            'allow_public' => true,
            ));

        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '8000',
            'user_id' => 3,
            'company_name' => "Rund35 pitch",
            'allow_public' => true,
            ));

        Pitch::create(array(
            'video_url' => 'wmNks09GZ3s',
            'investment_size' => '900000',
            'user_id' => 3,
            'company_name' => "Round 35 pitcheeeees",
            'allow_public' => true,
            ));
    }

}