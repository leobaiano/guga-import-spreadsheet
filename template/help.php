<!-- PAGINA 1 -->
<h2>Usage</h2>

<pre>
  To use, activate the plugin and click the "Import Spreadsheet" option in the
  Wordpress admin toolbar / sidebar.

  Spreadsheets should have the top row reserved for header names, with everything
  after being the actual data.

  Select the file you want to upload, the post type to create, then click Upload.
  The next step you choose which columns to map to the fields. Depending on the
  field type different options will appear. Dates will have a format in and format
  out text entry which accepts PHP date() format strings. The standard format out
  for ACF date pickers is automatically inserted for you. Post objects and
  relationships will do a reverse lookup in the post titles. This may have more
  flexibility in the future.

  Click Upload and the posts will be created. A log is then generated if errors /
  warnings are produced.

  To make contributions visit: <a href="https://github.com/thechurch/wp-spreadsheet-acf-import">https://github.com/thechurch/wp-spreadsheet-acf-import</a>
</pre>
