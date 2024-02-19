<!DOCTYPE html>
<div id="container">
<svg id="shapes"></svg>

</div>
<script type="module">

import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

const svg = d3.select("#shapes");

svg.append("circle")
  .attr("cx", 50)
  .attr("cy", 50)
  .attr("r", 40)
  .attr("fill", "red");
</script>