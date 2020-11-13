<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $loop  = 0;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        $pwd = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $name = "brain pop";
        $email = "brainpop123@gmail.com";
        $this->loop++;
        if ($this->loop < 2 ) {
            $email = $this->faker->unique()->safeEmail;
            $name = $this->faker->name;  
            $pwd =  bcrypt( Str::random(10));       
        }
           

        return [
            'name' => $name , //$this->faker->name ,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => $pwd,
            'remember_token' => Str::random(10),
        ];
    }
}
