d3.selectAll("span")
    .datum(function(){return this.dataset;})
    .style("height","10%")
    .style("left",(d,i)=>(i*80+30)+"px")
    .transition().duration(2000)
    .style("height",d=>d.val+"%");