<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $grupa;
    public $firstname;
    public $lastname;
    public $zdjecie;
    public $link;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        /*'101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],*/
        '102'=>[
            'id' => '102',
            'username' => 'student',
            'password' => 'student',
            'authKey' => 'test102key',
            'accessToken' => '102-token',
            'grupa'=>'student',
            'firstname'=>'Jan',
            'lastname'=>'Nowak',
            'zdjecie'=>'https://umg.edu.pl/sites/default/files/zalaczniki/umg-zolty.png',
            'link'=>'https://umg.edu.pl'
        ],
        '103'=>[
            'id' => '103',
            'username' => 'adam',
            'password' => 'adam',
            'authKey' => 'test103key',
            'accessToken' => '103-token',
            'grupa'=>'student',
            'firstname'=>'Adam',
            'lastname'=>'Ram',
            'zdjecie'=>'https://images.unsplash.com/photo-1557862921-37829c790f19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80',
            'link'=>'https://unsplash.com/'
        ],
        '104'=>[
            'id' => '104',
            'username' => 'iwona',
            'password' => 'iwona',
            'authKey' => 'test104key',
            'accessToken' => '104-token',
            'grupa'=>'student',
            'firstname'=>'Iwona',
            'lastname'=>'Rak',
            'zdjecie'=>'https://images.unsplash.com/photo-1542740348-39501cd6e2b4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80',
            'link'=>'https://unsplash.com/'
        ]
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
