<?php

// The MIT License
// 
// Copyright (c) 2012 +THECHURCH+
// 
// Permission is hereby granted, free of charge, to any person obtaining a
// copy of this software and associated documentation files
// (the "Software"), to deal in the Software without restriction,
// including without limitation the rights to use, copy, modify, merge,
// publish, distribute, sublicense, and/or sell copies of the Software, and
// to permit persons to whom the Software is furnished to do so, subject to
// the following conditions:
// 
// The above copyright notice and this permission notice shall be included
// in all copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
// OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
// IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
// CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
// TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
// SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

/**
 * View for the CSV Advanced Fields plugin.
 * 
 * @package Csvaf
 * @version 0.1
 */
class CsvafView {
  /**
   * Render out the upload form.
   * 
   * @static
   * @param   string  $action     The form action.
   * @param   string  $noncekey   The nonce key.
   * @param   string  $noncevalue The nonce value.
   * @param   string  $posttypes  The post types to list
   * @param   string  $headblock
   * @param   string  $footblock
   * @access  public
   * @return  string              The HTML for the upload form.
   */
  public static function Uploadform (
    $action, $noncekey, $noncevalue, $posttypes, $headblock, $footblock
  ) {
    ob_start();
    include CSVAFPLUGINPATH . '/template/upload-form.php';
    return ob_get_clean();
  }

  /**
   * Render out the upload form.
   *
   * @static
   * @access  public
   * @param   string  $action     The form action.
   * @param   string  $noncekey   The nonce key.
   * @param   string  $noncevalue The nonce value.
   * @param   array   $headers    The data headers
   * @param   array   $fields     The mapping fields
   * @param   array   $posttypes  The post types
   * @param   string  $filename   The upload filename
   * @return  string              The HTML for the upload form.
   */
  public static function Mapperform (
    $action, $noncekey, $noncevalue, $headers, $fields, $posttypes, $filename
  ) {
    ob_start();
    include CSVAFPLUGINPATH . '/template/mapper-form.php';
    return ob_get_clean();
  }

  /**
   * Render the help content
   *
   * @static
   * @access  public
   * @return  string
   */
  public static function Help () {
    ob_start();
    include CSVAFPLUGINPATH . '/template/help.php';
    return ob_get_clean();
  }

  /**
   * Render the warning log
   *
   * @static
   * @access  public
   * @param   array   $validations
   * @param   array   $uniques
   * @return  string
   */
  public static function Warninglog ($validations, $uniques) {
    ob_start();
    include CSVAFPLUGINPATH . '/template/warning-log.php';
    return ob_get_clean();
  }

  public static function Errorbanner ($message) {
    ob_start();
    include CSVAFPLUGINPATH . '/template/error-banner.php';
    return ob_get_clean();
  }
}
