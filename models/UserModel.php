<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    public function auth($userName, $password) {
        $md5Password = $password;
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        // var_dump($input);die();
        $temp = 'SELECT version FROM users WHERE id ='.$input['id'].'';
        $newtemp = $this->select($temp);
        // var_dump($newtemp[0]['version']);
        // var_dump($input['version']);die();


        if($newtemp[0]['version'] == $input['version']){
            $newV = $input['version'] + 1;
            $sql = 'UPDATE users SET 
                  name = "' . $input['name'] .'", 
                  fullname = "' . $input['fullname'] .'",
                  email = "' . $input['email'] .'",
                  password="'. md5($input['password']) .'", type = "'.$input['type'].'", version = "'.$newV.'" 
                  WHERE id = ' . $input['id'];
         $user = $this->update($sql);
        //  var_dump($user);die();
         header('location:list_users.php');
         return user;

        }
        else{
                header('location:list_users.php?err'); 
        }
    }
    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $input['version'] = 1;
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`, `version`) VALUES (" .
                "'" . $input['name'] . "', '".$input['fullname']."', '".$input['email']."', '".$input['type']."', '".$input['password']."', '".$input['version']."')";

        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
        } else {
            $sql = 'SELECT * FROM users';
        }

        $users = $this->select($sql);

        return $users;
    }
}