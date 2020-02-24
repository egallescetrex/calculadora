<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('role_id', 'integer', ['signed' => 'disable'])
            ->addColumn('password', 'string')
            ->addColumn('token', 'string', ['null' => true])

            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')

            ->addIndex(['email'], ['unique' => true])
            ->addForeignKey('role_id', 'roles', 'id', [
                'delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
