<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Eerste manier voor single entries
        
        /*\DB::table('users')->insert([
            'first_name' => 'Ilya',
            'last_name' => 'Plyusnin',
            'email' => 'r0612515@student.thomasmore.be',
            'password' => 'C5g8Cq#xoe&GqAkd^8NaahCQ',
            'wallet' => '1',
            'favorites' => '{nft:{}}'
        ]);*/

        //Tweede manier voor single entries

        $user = new \App\Models\User();
        $user->first_name = "Ilya";
        $user->last_name = "Plyusnin";
        $user->email = "r0612515@student.thomasmore.be";
        $user->password = "C5g8Cq#xoe&GqAkd^8NaahC";
        $user->wallet = "1";
        $user->profile_picture = "https://res.cloudinary.com/doafzvgjh/image/upload/v1634674189/unmk6hbinwxqmqyumgvs.png";
        $user->save();
        
        $user = new \App\Models\User();
        $user->first_name = "Bailey";
        $user->last_name = "Lievens";
        $user->email = "r0744287@student.thomasmore.be";
        $user->password = "YsT*LNrjFf*AQkjh^2YAS\$s5";
        $user->wallet = "2";
        $user->profile_picture = "https://res.cloudinary.com/doafzvgjh/image/upload/v1634674526/bxpcjyf39tbutp1myt0u.png";
        $user->save();
        
        $user = new \App\Models\User();
        $user->first_name = "Ellen";
        $user->last_name = "Hiel";
        $user->email = "r0784737@student.thomasmore.be";
        $user->password = "F@%Br8UbSz!!exwxth\$mwNWc";
        $user->wallet = "3";
        $user->profile_picture = "https://res.cloudinary.com/doafzvgjh/image/upload/v1634674518/mvornfn9rl8lno3krbhn.png";
        $user->save();
        
        $user = new \App\Models\User();
        $user->first_name = "Nick";
        $user->last_name = "Bevers";
        $user->email = "r0702962@student.thomasmore.be";
        $user->password = "WSZmcXm2ewGX*T9C3HEwmwM!";
        $user->wallet = "4";
        $user->profile_picture = "https://res.cloudinary.com/doafzvgjh/image/upload/v1634674336/lalteyjlxphogk72fxeq.png";
        $user->save();
    }
}
