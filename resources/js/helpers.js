
export default function createSadFace(){
    const sadFaces = ['╰( ͡° ʖ̯ ͡° )つ──☆*:・ﾟ', '╰(〒︿〒)╯', '╥﹏╥', '╰(ಥ﹏ಥ）╯', '(｡•́︿•̀｡)']
    return sadFaces[Math.floor(Math.random()*sadFaces.length)];
}