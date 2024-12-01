const likeBtns = document.querySelectorAll(".like-btn");
for(let index=0; index<likeBtns.length; index++){
    likeBtns[index].addEventListener("click", async (e) => {
    const clickedEl = e.target;
    clickedEl.classList.toggle("liked");
    const postId = e.target.id;

    const res = await fetch("/action/like", {
        //リクエストメソッドはPOST
        method: "POST",
        headers: {
            //Content-Typeでサーバーに送るデータの種類を伝える。今回はapplication/json
            "Content-Type": "application/json",
            //csrfトークンを付与
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ action_id: postId }),
    })
        .then((res) => res.json())
        .then((data) => {
            clickedEl.nextElementSibling.innerHTML = data.likescount;
        })
        .catch(() =>
            alert(
                "処理が失敗しました。画面を再読み込みし、通信環境の良い場所で再度お試しください。"
            )
        );
});
}
