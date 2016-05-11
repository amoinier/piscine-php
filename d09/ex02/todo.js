var make = new Array();
var i = 0;
var k = 0;

function isEmpty(str) {
    return (!str || 0 === str.length);
}
if (!isEmpty(get_cook())){
	make = get_cook();
	k = make.length - 1;
	var parentDiv = document.getElementById("ft_list");
	var firstChild = parentDiv.firstChild;
	while (k >= 0)
	{
		var newDiv = document.createElement("div");
		newDiv.setAttribute('id', "div"+k);
		newDiv.setAttribute('onClick', "del('div"+k+"',"+k+");");
		var newContent = document.createTextNode(make[k]);
		newDiv.appendChild(newContent);

		parentDiv.insertBefore(newDiv,firstChild);
		k--;
	}
	i = make.length - 1;
}
function add() {
	var parentDiv = document.getElementById("ft_list");
	var firstChild = parentDiv.firstChild;
	make[i] = prompt('Ajouter un element', '');

	if (!isEmpty(make[i])) {
		var newDiv = document.createElement("div");
		newDiv.setAttribute('id', "div"+i);
		newDiv.setAttribute('onClick', "del('div"+i+"',"+i+");");
		var newContent = document.createTextNode(make[i]);
		newDiv.appendChild(newContent);

		parentDiv.insertBefore(newDiv,firstChild);
		make_cook();
		i++;
	}
}

function del(str, id) {
	if (confirm("Delete?")) {
		var parentDiv = document.getElementById("ft_list");
		var element = document.getElementById(str);
		parentDiv.removeChild(element);
		make.splice(id, 1);
		make_cook();
	}
}

function make_cook() {
	var d = new Date();
	d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = "COOKIE=" + JSON.stringify(make)+";"+expires;
}

function get_cook() {

	var cake = document.cookie;
	if (cake.indexOf("COOKIE") == 0) {
		cake = cake.split(";")[0].split("=")[1];
		return JSON.parse(cake);
	}
	return ([]);
}
