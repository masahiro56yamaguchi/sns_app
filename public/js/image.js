// 追加

document.querySelector('#image').addEventListener('change', (event) => {
  const file = event.target.files[0]

  // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
  // !fileがfalseの場合にreturnする。
  if (!file) return

  const reader = new FileReader()

  reader.onload = (event) => {
    document.querySelector('#restaurant-img').src = event.target.result
  }

  reader.readAsDataURL(file)
})