<?php
class NightsWatch {
    protected $_members = array();

    function recruit($member)
	{
        if ($member instanceof IFighter)
            array_push($this->_members, $member);
    }
    function fight()
	{
        foreach ($this->_members as $member)
            $member::fight();
    }
}

?>
