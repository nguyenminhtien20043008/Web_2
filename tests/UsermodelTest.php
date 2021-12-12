<?php					
use PHPUnit\Framework\TestCase;					
					
class UserModelTest extends TestCase					
{					
					
/**					
* Test case Okie					
*/					
public function testSumOk()					
{					
$userModel = new UserModel();					
$a = 1;					
$b = 2;					
$expected = 3;//Tự tính					
					
$actual = $userModel->sumb($a,$b);//Kết quả của Chương trình gọi					
					
$this->assertEquals($expected, $actual);					
}
public function testFindUserByIdWithOK()
{
  $userModel = new UserModel();
  $expected = [
    "id" => 91,
    "name" => "test2",
    "fullname" => "test2",
    "email" => "test2@gmail.com",
    "type" => "user",
    "password" => "hghh",
    "version" => "1",
  ];
  $actual = $userModel->findUserById(91);
  $this->assertEquals($expected, $actual[0]);
}
public function testFindUserByIdWithNullId()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById(null);
    $this->assertEquals($expected, $actual);
  }
			
public function testFindUserByIdWithcharaterNotOk()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById("a");
    $this->assertEquals($expected, $actual);
  }
  public function testFindUserByIdNotOk()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById(-12);
    $this->assertEquals($expected, $actual);
  }
  public function testFindUserByIdObjectNotOk()
  {
    $userModel = new UserModel();
    $object = (object)12;
    $expected = false;
    //var_dump($object);die();
    $actual = $userModel->findUserById($object);
    $this->assertEquals($expected, $actual);
  }
  public function testFindUserNameWithOK()
  {
    $userModel = new UserModel();
    $expected = [
      "id" => 91,
      "name" => "test2",
      "fullname" => "test2",
      "email" => "test2@gmail.com",
      "type" => "user",
      "password" => "hghh",
      "vesion" => "1",
    ];
    $keyword = "test2";
    $actual = $userModel->findUser($keyword);
    $this->assertEquals($expected, $actual[0]);
  }
  public function testFindUserEmailWithOK()
  {
    $userModel = new UserModel();
    $expected = [
      "id" => 91,
      "name" => "test2",
      "fullname" => "test2",
      "email" => "test2@gmail.com",
      "type" => "user",
      "password" => "hghh",
      "vesion" => "1",
    ];
    $keyword = "test2@gmail.com";
    $actual = $userModel->findUser($keyword);
    $this->assertEquals($expected, $actual[0]);
  }
  public function testFindUserByIdWithNullkeyword()
  {
    $userModel = new UserModel();
    $expected = false;
    $keyword = null;
    $actual = $userModel->findUser($keyword);
    $this->assertEquals($expected, $actual);
  }
  
  
  
 //finduser
  public function testFindUsersOk()
  {
    $user = new UserModel();
    $keys = "a";
    $actual = $user->findUser($keys);
    if (empty($actual)) {
      $this->assertTrue(true);
      } else {
        $this->assertTrue(false);
      }
  }
  public function testFindUserNg()
    {
      $user = new UserModel();
      $keys = "45125215sad";
  
      $actual = $user->findUser($keys);
      if (empty($actual)) {
        $this->assertTrue(true);
        } else {
          $this->assertTrue(false);
        }
    }
  public function testFindUserNull()
    {
      $user = new UserModel();
      $keys = null;
  
      $actual = $user->findUser($keys);
      if (empty($actual)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
    }
  public function testFindUserNumber()
    {
      $user = new UserModel();
      $keys = 123;
  
      $actual = $user->findUser($keys);
      if (empty($actual)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
    }
      //update
  public function testUpdateUserOk()
    {
      $user = new UserModel();
      $input = [];
          $input['id'] = 91;
          $input['name'] = "test2";
          $input['fullname'] = "test2";
          $input['email'] = "test2@gmail.com";
          $input['type'] = user;
          $input['password'] = "hghh";
          $input['vesion'] = "1";
      $actual = $user->updateUser($input);
  
      if ($actual == true) {
          return $this->assertTrue(true);
      }
        return $this->assertTrue(false);
    }
  public function testUpdateUserIdNotExist()
      {
          $user = new UserModel();
          $input = [];
          $input['id'] = 91;
          $input['name'] = "test2";
          $input['fullname'] = "test2";
          $input['email'] = "test2@gmail.com";
          $input['type'] = user;
          $input['password'] = "hghh";
          $input['vesion'] = "1";
          $actual = $user->updateUser($input);
  
          // var_dump($actual);die();
          if ($actual == false) {
              return $this->assertTrue(false);
          }
          return $this->assertTrue(true);
      }
      public function testUpdateUserIdNull()
      {
          $user = new UserModel();
          $input = [];
          $input['id'] = null;
          $input['name'] = "test2";
          $input['fullname'] = "test2";
          $input['email'] = "test2@gmail.com";
          $input['type'] = user;
          $input['password'] = "hghh";
          $input['vesion'] = "1";
          $actual = $user->updateUser($input);
  
          // var_dump($actual);die();
          if ($actual == false) {
              return $this->assertTrue(true);
          }
          return $this->assertTrue(false);
      }
      //delete
      
  }