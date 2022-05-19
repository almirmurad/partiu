window.onload = async()=>{

    let url = `http://dataservice.accuweather.com/currentconditions/v1/44944?apikey=OYV5niMxriBAqMi8GuVSKKwyfWQV9dI9&language=pt-BR&details=true&metric=true`;
    let results = await fetch(url);
    
    if(results.status === 200){
        let json = await results.json();
        showInfo({
            name:"Cutitiba",
            clima:json['0'].WeatherText,
            icon:json['0'].WeatherIcon,
            unit:json['0'].Temperature.Metric.Unit,
            tempAtual:json['0'].Temperature.Metric.Value,
        });
    }
    
    function showInfo(json){
        document.querySelector(".city").innerHTML = `${json.icon}`;
        document.querySelector(".city").innerHTML = `${json.name}`;
        document.querySelector(".current").innerHTML = `${json.tempAtual}º${json.unit}`;
        document.querySelector(".cli-area-img img").setAttribute('src', `/partiu/public/assets/img/clima/${json.icon}-s.png`);
        document.querySelector(".clima-current").innerHTML = `${json.clima}`;
    }

    
    let urlCotation = `https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,BTC-BRL`;

    let resultsCotation = await fetch(urlCotation);

    console.log(resultsCotation.status);

    if(resultsCotation.status === 200){
        let jsonCotation = await resultsCotation.json();
        showInfoCotation({
            nameUsd:jsonCotation.USDBRL.code,
            nameEur:jsonCotation.EURBRL.code,
            nameBit:jsonCotation.BTCBRL.code,
            dolarVenda:jsonCotation.USDBRL.bid,
            euroVenda:jsonCotation.EURBRL.bid,
            bitVenda:jsonCotation.BTCBRL.bid,
        });
    }

    function showInfoCotation(jsonCotation){
        document.querySelector("#usd").innerHTML = `${jsonCotation.nameUsd}`;
        document.querySelector("#bit").innerHTML = `${jsonCotation.nameBit}`;
        document.querySelector("#eur").innerHTML = `${jsonCotation.nameEur}`;
        document.querySelector("#usdVlr").innerHTML = `${jsonCotation.dolarVenda}`;
        document.querySelector("#bitVlr").innerHTML = `${jsonCotation.bitVenda}`;
        document.querySelector("#eurVlr").innerHTML = `${jsonCotation.euroVenda}`;
    }


}



