<?php
/**
 * @param $roles
 * @param null $user
 *
 * @return bool
 */
function is_role($roles, $user = null)
{
    if ($user == null) {
        if (is_login()) {
            $user_roles = Yii::$app->user->identity->role;
        } else {
            return false;
        }
    } else {
        $user_roles = $user->role;
    }

    if (is_array($roles)) {
        foreach ($roles as $role) {
            if (in_array($role, $user_roles)) {
                return true;
            }
        }
    } else {
        return (in_array($roles, $user_roles));
    }

    return false;
}

/**
 * @return bool
 */
function is_login()
{
    return !Yii::$app->user->isGuest;
}