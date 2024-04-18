
// 気象庁のサイトから取得したJSONデータのURL
const url = "https://www.jma.go.jp/bosai/forecast/data/forecast/130000.json";
// fetch 関数を使って、JSONデータを取得する
fetch(url)
    .then((response) => {
        // JSON データを取得する
        response.json().then((json) => {
            // JSON データをコンソールに表示する
            // console.log(json);
            console.log(json[0].reportDatetime) ;
            console.log(json[0].timeSeries[0].areas[0].area.name);
            console.log(json[0].timeSeries[0].areas[0].weathers[0]);
        })
    })
    .catch((error) => {
        // エラーが発生した場合は、エラーメッセージをコンソールに表示する
        console.error("Error:", error);
    });


// async/await を使って、fetch 関数を使ってJSONデータを取得する
async function fetchJson() {
    const response = await fetch(url);
    const json = await response.json();
    console.log(json[0].reportDatetime) ;
    console.log(json[0].timeSeries[0].areas[0].area.name);
    console.log(json[0].timeSeries[0].areas[0].weathers[0]);
}
fetchJson() ;

