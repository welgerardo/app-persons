<?php

namespace App\Entity;

class Person_1
{
    private string $id;
    private string $firstName;
    private ?string $lastName   = null;
    private ?string $middleName = null;
    private ?string $address     = null;

    #region id
    /**
     * @param string $value
     * @return boolean
     */
    public function setId(string $value) : bool
    {
        $this->id = $value;

        return true;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }
    #endregion id
    
    #region first name
    /**
     * @param string $value
     * @return boolean
     */
    public function setFirstName(string $value) : bool
    {
        $this->firstName = $value;

        return true;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }
    #endregion first name

    #region last  name
    /**
     * @param string $value
     * @return boolean
     */
    public function setLastName(string $value) : bool
    {
        $this->lastName = $value;

        return true;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }
    #endregion last name

    #region middle name
    /**
     * @param string $value
     * @return boolean
     */
    public function setMidlleName(string $value) : bool
    {
        $this->middleName = $value;

        return true;
    }

    /**
     * @return string
     */
    public function getMiddleName() : string
    {
        return $this->middleName;
    }
    #endregion first name

    #region address name
    /**
     * @param string $value
     * @return boolean
     */
    public function setAddress(string $value) : bool
    {
        $this->address = $value;

        return true;
    }

    
    /**
     * @return string
     */
    public function getAdress() : string
    {
        return $this->address;
    }
    #endregion adress name

    #region validation
    public function isValid()
    {
        # code...
    }
    #endregion validation
}
