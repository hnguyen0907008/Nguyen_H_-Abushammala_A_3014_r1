async function fetchData(sourceURL) {

    let resource = await fetch(sourceURL).then(response => {
        if (response.status !== 200) {
            throw new Error(`Error ${response.status}: "Error!..."}`);
        } 

        return response;           
    });
    let dataset = await resource.json();

    return dataset;
}


export { fetchData };