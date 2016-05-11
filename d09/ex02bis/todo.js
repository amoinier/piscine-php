var make = new Array();
var i = 0;
var k = 0;

function isEmpty(str) {
    return (!str || 0 === str.length);
}

if (!isEmpty(get_cook()))
{
	make = get_cook();
	k = 0;
	while (k < make.length)
	{
		$("#ft_list").prepend("<div id=\"" + k + "\">" + make[k] + "</div>");
		k++;
	}
}

$('#New').click(function()
{
	i = make.length;
	make[i] = prompt('Ajouter un element', '');
	if (!isEmpty(make[i]))
	{
		$("#ft_list").prepend("<div id=\"" + i + "\">" + make[i] + "</div>");
		make_cook();
	}
});

$(this).click(function()
{
	var target = event.target.id;
	if ($.isNumeric(target))
	{
		if (confirm("Delete?"))
		{
			var str = $("#"+target).text();
			$("#"+target).remove();
			make.splice(make.indexOf(str), 1);
			document.cookie = "COOKIE=" + JSON.stringify(make)+";";
		}
	}
});

function make_cook()
{
	document.cookie = "COOKIE=" + JSON.stringify(make)+";";
}

function get_cook()
{
	var cake = document.cookie;
	if (cake.indexOf("COOKIE") == 0)
	{
		cake = cake.split(";")[0].split("=")[1];
		return JSON.parse(cake);
	}
	return ([]);
}
