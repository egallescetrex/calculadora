<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $password = $hasher->hash('123456');

        $data = [
            'email'    => 'admin@gmail.com',
            'role_id'  => 1,
            'password' => $password,
            'created'  => date("Y-m-d H:i:s"),
            'modified' => date("Y-m-d H:i:s")
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
