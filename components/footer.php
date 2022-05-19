<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = [
    'Laki-Laki',
    'Perempuan',
  ];
  const dataset = JSON.parse("<?= '[' . implode(',', $mhs_jk) . ']' ?>");

  const data = {
    labels: labels,
    datasets: [{
      backgroundColor: ['#33ccff', '#ff66cc'],
      data: dataset,
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>

</html>