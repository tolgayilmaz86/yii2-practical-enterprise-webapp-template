<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use common\models\PermissionHelpers;
use common\models\ValueHelpers;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate() && $this->getUser()->status_id ==
            ValueHelpers::getStatusValue('Active')) {
            return Yii::$app->user->login($this->getUser(),
                $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    public function loginAdmin()
    {
        if (($this->validate()) && PermissionHelpers::requireMinimumRole('Admin', $this->getUser()->id))
        {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        else
        {
            throw new NotFoundHttpException('You Shall Not Pass.'.($this->getUser()->email));
        }
//        if (($this->validate()) && $this->getUser()->role_id >=
//            ValueHelpers::getRoleValue('Admin')
//            && $this->getUser()->status_id ==
//            ValueHelpers::getStatusValue('Active')) {
//            return Yii::$app->user->login($this->getUser(),
//                $this->rememberMe ? 3600 * 24 * 30 : 0);
//        } else {
//            throw new NotFoundHttpException('You Shall Not Pass.');
//        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }

}
