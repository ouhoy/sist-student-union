function $(id, slectAll = false) {
  return slectAll ? document.querySelectorAll(id) : document.querySelector(id);
}
