function testuKaxa() {
	var container = document.getElementById("container");
	while (container.hasChildNodes()) {
		container.removeChild(container.lastChild);
	}
	if (document.getElementById("espezialitatea").selectedIndex==3) {
		<!-- container.appendChild(document.createTextNode("Besterik: ")); -->
		var input = document.createElement("input");
		input.id = "dinamikoa";
		input.type = "text";
		input.name = "Espezialitatea";
		container.appendChild(input);
		container.appendChild(document.createElement("br"));
	}
}