<?php
namespace app\commands;
 
use Yii;
use yii\console\Controller;
use app\rbac\UserGroupRule;
 
 
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
 
 
         $auth->removeAll();
        // Rules
        $groupRule = new UserGroupRule();
 
        $auth->add($groupRule);
 
// Roles
        $user = $auth->createRole('user');
        $user->description = 'User';
        $user->ruleName = $groupRule->name;
        $auth->add($user);
 
        $moderator = $auth->createRole(' moderator ');
        $moderator ->description = 'Moderator ';
        $moderator ->ruleName = $groupRule->name;
        $auth->add($moderator);
        $auth->addChild($moderator, $user);
 
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $admin->ruleName = $groupRule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moderator);
 
        $superadmin = $auth->createRole('superadmin');
        $superadmin->description = 'Superadmin';
        $superadmin->ruleName = $groupRule->name;
        $auth->add($superadmin);
        $auth->addChild($superadmin, $admin);
 
        // Superadmin assignments
		if (isset($id))
        if ($id !== null) {
            $auth->assign($superadmin, $id);
        }
    }
}