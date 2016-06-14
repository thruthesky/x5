<?php
class JobMaid {
    private $ID = 0;
    public function __construct()
    {
        $this->ID = get_the_ID();
    }

    public function stay_in()
    {
        return get_post_meta( $this->ID, 'stay_in', true);
    }


    public function birthday()
    {
        return get_post_meta( $this->ID, 'birthday', true);
    }

    public function age()
    {
        $birthday = $this->birthday();
        if ( empty( $birthday  ) ) return 'N/A';
        $age = date('Y') - $birthday;
        return $age;
    }

    public function position()
    {
        return get_post_meta( $this->ID, 'position', true);
    }

    public function english_speak()
    {
        return get_post_meta( $this->ID, 'english_speak', true);
    }

    public function korean_speak()
    {
        return get_post_meta( $this->ID, 'korean_speak', true);
    }

    public function name()
    {
        return get_post_meta( $this->ID, 'name', true);
    }

    public function mobile()
    {
        return get_post_meta( $this->ID, 'mobile', true);
    }

    public function email()
    {
        return get_post_meta( $this->ID, 'email', true);
    }

    public function gender()
    {
        return get_post_meta( $this->ID, 'gender', true);
    }
    public function year_of_experience()
    {
        return get_post_meta( $this->ID, 'year_of_experience', true);
    }
}
$_jobMaid = new JobMaid();
function maid() {
    global $_jobMaid;
    return $_jobMaid;
}
