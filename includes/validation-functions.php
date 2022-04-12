<?php
/**
 * Additional filtering of form fields
 */
if ( ! function_exists( 'vabfwc_sanitize_text_field' ) ) {
	function vabfwc_sanitize_text_field( $array ) {
		foreach ( $array as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = vabfwc_sanitize_text_field( $value );
			}
			else {
				$value = sanitize_text_field( $value );
			}
		}
		return $array;
	}
}
if ( ! function_exists( 'VABFWC_is_tel' ) ) {
	function VABFWC_is_tel( $tel ) {
		$pattern = '%^[+]?'
			.'(?:\([0-9]+\)|[0-9]+)'
			.'(?:[/ -]*'
			.'(?:\([0-9]+\)|[0-9]+)'
			.')*$%';
		$result = preg_match( $pattern, trim( $tel ) );
		return apply_filters( 'VABFWC_is_tel', $result, $tel );
	}
}
if ( ! function_exists( 'VABFWC_is_email' ) ) {
	function VABFWC_is_email( $email ) {
		$result = is_email( $email );
		return apply_filters( 'VABFWC_is_email', $result, $email );
	}
}
if ( ! function_exists( 'VABFWC_is_date' ) ) {
	function VABFWC_is_date( $date ) {
		$result = preg_match( '/^([0-9]{4,})-([0-9]{2})-([0-9]{2})$/', $date, $matches );
		if ( $result ) {
			$result = checkdate( $matches[2], $matches[3], $matches[1] );
		}
		return apply_filters( 'VABFWC_is_date', $result, $date );
	}}
if ( ! function_exists( 'VABFWC_is_number' ) ) {
	function VABFWC_is_number( $number ) {
		$result = is_numeric( $number );
		return apply_filters( 'VABFWC_is_number', $result, $number );
	}
}
if ( ! function_exists( 'VABFWC_is_url' ) ) {
	function VABFWC_is_url( $url ) {
		$result = ( false !== filter_var( $url, FILTER_VALIDATE_URL ) );
		return apply_filters( 'VABFWC_is_url', $result,$url );
	}}
if ( ! function_exists( 'VABFWC_Chek_url' ) ) {
	function VABFWC_Chek_url( $url ) {
		return preg_match_all( '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $url, $match );
	}
}
if ( ! function_exists( 'VABFWC_Only_url' ) ) {
	function VABFWC_Only_url( $url ) {
		return preg_match( '|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url );
	}
}