<?php

if ( ! function_exists('selected')) {
    /**
     * return the html attribute "selected"
     * this function compares the first two arguments if they are identical
     * it returns
     * the third parameter will help us use the 
     * same function in the context of radio buttons
     *  
     * @param   string   $selected
     * @param   string   $current
     * @param   array    $type
     * @return  string
     */
    function selected( $selected, $current , $type="selected" ) {
    	if ( (string) $helper === (string) $current )
    	    $result = " $type='$type'";
    	else
    		$result = '';
    
    	return $result;
    }
}



if ( ! function_exists('array_to_html_attr')) {
	/**
	 * convert associative array into html attribute style.
	 * 
	 * $attributes = [
	 * 	'id' 	=> 'html-id',
	 * 	'class' => 'html-class-name'
	 * ];
	 *
	 * outputs 
	 * id="html-id" class="html-class-name"
	 *  
	 * @param  array  $attributes
	 * @return string
	 */
	function array_to_html_attr($attributes)
	{
		$attributes = array_map(function ($k, $v){ 
			return $k .'="'. htmlspecialchars($v) .'"'; 
		}, array_keys($attributes), $attributes );
	
		return implode(' ', $attributes);
	}
}



if ( ! function_exists('array_to_dropdown')) {
    /**
     * convert associative array into html select box.
     * 
     *  
     * @param  array  $items
     * @param  string  $selected
     * @return array $attributes
     */
    function array_to_dropdown($items , $selected , $attributes)
    {
        $select_html    = "";
        $options        = "";
        $attributes     = array_to_html_attr($attributes);

        foreach ($items as $key => $value) {
            // $ifselected  = (  $key ===  $selected ) ? "selected=selected" : "";
            $ifselected  = selected($selected , $key);
            $options    .= sprintf("\t<option value='%s' %s>%s</option>\n" , $key , $ifselected , $value);
        }

        $select_html = sprintf("<select %s>\n%s</select>" , $attributes , $options);
        return $select_html;
    }
}
