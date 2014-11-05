<?php

namespace Test;

/**
 * Class UnitTest
 */
class UnitTest extends \UnitTestCase {

    public function testValidateTrue() {
        $user = new \Users();
        $userMember = array(
            "name" => "Nguyen Thi Hue",
            "email" => "aaaa@gmail.com"
        );
        $this->assertTrue($user->save($userMember));

        $userMember1 = array(
            "name" => "",
            "email" => "aaaa@gmail.com"
        );
        $this->assertFalse($user->save($userMember1));
        $userMember2 = array(
            "name" => "Nguyen Thi Hue",
            "email" => ""
        );
        $this->assertFalse($user->save($userMember2));
        $userMember3 = array(
            "name" => "Nguyen Thi Hue",
            "email" => "aaaa"
        );
        $this->assertFalse($user->save($userMember3));
        $userMember4 = array(
            "name" => "",
            "email" => ""
        );
        $this->assertFalse($user->save($userMember4));

        $messages = $user->getMessages();
        $this->assertEquals($messages[0]->getField(), 'name');

        $userFind = \Users::findFirstByEmail('aaaa@gmail.com');
        $this->assertEquals($userFind->name, 'Nguyen Thi Hue');
    }
}
