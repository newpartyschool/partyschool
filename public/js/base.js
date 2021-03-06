

//前台调用
var $ = function () {
	return new Base();
}

//基础库
function Base() {}

//创建一个数组，来保存获取的节点和节点数组
Base.prototype.elements = [];

//获取ID节点
Base.prototype.getId = function (id) {
	this.elements.push(document.getElementById(id));
	return this;
};

//获取元素节点数组
Base.prototype.getTagName = function (tag) {
	var tags = document.getElementsByTagName(tag);
	for (var i = 0; i < tags.length; i ++) {
		this.elements.push(tags[i]);
	}
	return this;
};
//设置CSS
Base.prototype.css = function (attr, value) {
	for (var i = 0; i < this.elements.length; i ++) {
		if (arguments.length == 1) {
			if (typeof window.getComputedStyle != 'undefined') {//W3C
				return window.getComputedStyle(this.elements[i], null)[attr];
			} else if (typeof this.elements[i].currentStyle != 'undeinfed') {//IE
				return this.elements[i].currentStyle[attr];
			}
		}
		this.elements[i].style[attr] = value;
	}
	return this;
}
//触发点击事件
Base.prototype.click = function (fn) {
	for (var i = 0; i < this.elements.length; i ++) {
		this.elements[i].onclick = fn;
	}
	return this;
}




















