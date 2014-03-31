<?php 

/**
 * Library base exception
 * 
 * @author Ehrlich, Andreas <ehrlich.andreas@googlemail.com>
 */
class EhrlichAndreas_KeyvalueCms_Module extends EhrlichAndreas_AbstractCms_Module
{

    /**
     *
     * @var string
     */
    private $tableKeyvalue = 'keyvalue';
	
    /**
     * Constructor
     * 
     * @param array $options
     *            Associative array of options
     * @throws EhrlichAndreas_KeyvalueCms_Exception
     * @return void
     */
    public function __construct ($options = array())
    {
        $options = $this->_getCmsConfigFromAdapter($options);
        
        if (! isset($options['adapterNamespace']))
        {
            $options['adapterNamespace'] = 'EhrlichAndreas_KeyvalueCms_Adapter';
        }
		
        if (! isset($options['exceptionclass']))
        {
            $options['exceptionclass'] = 'EhrlichAndreas_KeyvalueCms_Exception';
        }
        
        parent::__construct($options);
    }
    
    /**
     * 
     * @return EhrlichAndreas_KeyvalueCms_Module
     */
    public function install()
    {
        $this->adapter->install();
        
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTableKeyvalue ()
    {
        return $this->adapter->getTableName($this->tableKeyvalue);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsKeyvalue ()
    {
        return array
		(
            'keyvalue_id'   => 'keyvalue_id',
            'published'     => 'published',
            'updated'       => 'updated',
            'enabled'       => 'enabled',
            'extern_id'     => 'extern_id',
            'key'           => 'key',
            'value'         => 'value',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsKeyvalue ()
    {
        return array
		(
			'keyvalue_id'   => 'keyvalue_id',
		);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addKeyvalue ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        
        if (! isset($params['extern_id']))
        {
            $params['extern_id'] = '';
        }
        
        if (! isset($params['key']))
        {
            $params['key'] = '';
        }
        
        if (! isset($params['value']))
        {
            $params['value'] = '';
        }
        
        if (isset($params['extern_id']))
        {
            if (is_array($params['extern_id']))
            {
                $params['extern_id'] = implode('::', $params['extern_id']);
            }
        }
        
        if (isset($params['key']))
        {
            if (is_array($params['key']))
            {
                $params['key'] = implode('::', $params['key']);
            }
        }
		
		$function = 'Keyvalue';
		
		return $this->_add($function, $params, $returnAsString);
    }
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteKeyvalue ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
        
        if (isset($params['extern_id']))
        {
            if (is_array($params['extern_id']))
            {
                $params['extern_id'] = implode('::', $params['extern_id']);
            }
        }
        
        if (isset($params['key']))
        {
            if (is_array($params['key']))
            {
                $params['key'] = implode('::', $params['key']);
            }
        }
		
		$function = 'Keyvalue';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editKeyvalue ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
        
        if (isset($params['extern_id']))
        {
            if (is_array($params['extern_id']))
            {
                $params['extern_id'] = implode('::', $params['extern_id']);
            }
        }
        
        if (isset($params['key']))
        {
            if (is_array($params['key']))
            {
                $params['key'] = implode('::', $params['key']);
            }
        }
		
		$function = 'Keyvalue';
		
		return $this->_edit($function, $params, $returnAsString);
	}

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getKeyvalue ($params = array(), $returnAsString = false)
    {
        if (isset($params['extern_id']))
        {
            if (is_array($params['extern_id']))
            {
                $params['extern_id'] = implode('::', $params['extern_id']);
            }
        }
        
        if (isset($params['key']))
        {
            if (is_array($params['key']))
            {
                $params['key'] = implode('::', $params['key']);
            }
        }
        
		$function = 'Keyvalue';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getKeyvalueList ($where = array())
    {
        if (isset($where['extern_id']))
        {
            if (is_array($where['extern_id']))
            {
                $where['extern_id'] = implode('::', $where['extern_id']);
            }
        }
        
        if (isset($where['key']))
        {
            if (is_array($where['key']))
            {
                $where['key'] = implode('::', $where['key']);
            }
        }
        
		$function = 'Keyvalue';
		
		return $this->_getList($function, $where);
    }
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableKeyvalue ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editKeyvalue($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableKeyvalue ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editKeyvalue($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteKeyvalue ($params = array(), $returnAsString = false)
	{
		return $this->disableKeyvalue($params, $returnAsString);
	}
    
}

