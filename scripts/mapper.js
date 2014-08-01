;(function () {

var $           = jQuery
var TYPESTD     = null
var FORMATINTD  = null
var FORMATOUTTD = null
var DEFAULTTD   = null
var UNIQUETD    = null

function columnfield (i, select) {
  select              = $(select)
  var tr              = select.parent().parent()
  var td              = select.parent()
  var column          = select.data('column-id')
  var hastypes        = false
  var hasformat       = false

  var typestd         = TYPESTD.clone()
  var formatintd      = FORMATINTD.clone()
  var formatouttd     = FORMATOUTTD.clone()
  var defaulttd       = DEFAULTTD.clone()
  var uniquetd        = UNIQUETD.clone()
  var formatininput   = null
  var formatoutinput  = null
  var defaulttextarea = null
  var uniqueinput     = null

  var name = 'csvaf_column_' + column + '_type'
  typestd.find('> label').attr('for', name)
  typestd.find('> select').attr('name', name)

  name = 'csvaf_column_' + column + '_formatin'
  formatintd.find('> label').attr('for', name)
  formatininput = formatintd.find('> input')
  formatininput.attr('name', name)
  name = 'csvaf_column_' + column + '_formatout'
  formatouttd.find('> label').attr('for', name)
  formatoutinput = formatouttd.find('> input')
  formatoutinput.attr('name', name)

  name = 'csvaf_column_' + column + '_default'
  defaulttd.find('> label').attr('for', name)
  defaulttextarea = defaulttd.find('> textarea')
  defaulttextarea.attr('name', name)

  name = 'csvaf_column_' + column + '_unique'
  uniquetd.find('> label').attr('for', name)
  uniqueinput = uniquetd.find('> input')
  uniqueinput.attr('name', name)

  function insertformat () {
    if (hastypes) {
      typestd.remove()
      hastypes = false
    }
    if (hasformat) return
    hasformat = true
    td.after(formatintd)
    formatintd.after(formatouttd)
    formatouttd.after(defaulttd)
    defaulttd.after(uniquetd)
  }

  function inserttypes () {
    if (hasformat) {
      formatintd.remove()
      formatouttd.remove()
      hasformat = false
    }
    if (hastypes) return
    hastypes = typestd
    td.after(typestd)
    typestd.after(defaulttd)
    defaulttd.after(uniquetd)
  }

  select.change(function () {
    defaulttd.remove()
    uniquetd.remove()

    var field = CSVAFFIELDS[select.val()]
    if (!field) {
      hastypes  = false
      hasformat = false
      typestd.remove()
      formatintd.remove()
      formatouttd.remove()
      return
    }

    defaulttextarea.val(field['default'] || '')
    formatininput.val(field.formatin || '')
    formatoutinput.val(field.formatout || '')

    switch (field.type) {
    case 'lookup':
      inserttypes(tr, td)
      break
    case 'format':
      insertformat(tr, td)
      break
    default:
      hastypes  = false
      hasformat = false
      typestd.remove()
      formatintd.remove()
      formatouttd.remove()
      td.after(defaulttd)
      defaulttd.after(uniquetd)
      break;
    }
  })
}

function csvafmapperform () {
  console.log(CSVAFFIELDS)
  console.log(CSVAFTYPES)

  TYPESTD         = $(
      '<td>'
    + '<label for="">Post type:</label>'
    + '<select name=""></select>'
    + '</td>'
  )
  var typesselect = TYPESTD.find('> select')
  var type        = ''

  for (var i = 0, il = CSVAFTYPES.length; i < il; i++) {
    type = CSVAFTYPES[i]
    typesselect.append('<option value="' + type + '">' + type + '</option>')
  }

  FORMATINTD = $(
    '<td><label for="">Format in:</label> <input name="" type="text" /></td>'
  )
  FORMATOUTTD = $(
    '<td><label for="">Format out:</label> <input name="" type="text" /></td>'
  )
  DEFAULTTD = $(
    '<td><label for="">Default:</label> <textarea name=""></textarea></td>'
  )
  UNIQUETD = $(
    '<td><label for="">Unique:</label> <input type="checkbox" name="" /></td>'
  )

  $('select.column_field').each(columnfield)
}
window.csvafmapperform = csvafmapperform

})();
