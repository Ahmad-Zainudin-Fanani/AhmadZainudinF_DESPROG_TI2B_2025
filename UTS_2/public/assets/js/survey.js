$(function(){
  const $steps = $('.step');
  let idx = 0;

  const updateProgress = ()=>{
    const pct = Math.round(((idx+1)/$steps.length)*100);
    $('#progressBar').css('width', pct+'%');
    $('#progText').text(`Pertanyaan ${idx+1} dari ${$steps.length}`);
    $('#progPct').text(pct+'%');
    $('#btnPrev').toggle(idx>0);
    if (idx==$steps.length-1){
      $('#btnNext').hide(); $('#btnSubmit').show();
    } else {
      $('#btnNext').show(); $('#btnSubmit').hide();
    }
  };

  const goto = (i)=>{
    $steps.removeClass('active').eq(i).addClass('active');
    idx=i; updateProgress(); window.scrollTo({top:0,behavior:'smooth'});
  };

  updateProgress();

  $('#btnPrev').on('click', ()=>{ if (idx>0) goto(idx-1); });

  $('#btnNext').on('click', ()=>{
    const $cur = $steps.eq(idx);
    let ok = true;
    $cur.find('input[type=text], textarea').each(function(){ if (!$(this).val().trim()) ok=false; });
    if ($cur.find('input[type=radio][name]').length){
      const name = $cur.find('input[type=radio][name]').first().attr('name');
      if (!$(`input[type=radio][name='${name}']:checked`).length) ok=false;
    }
    if ($cur.find('input[type=checkbox][name="minat_bidang[]"]').length){
      if (!$('input[type=checkbox][name="minat_bidang[]"]:checked').length) ok=false;
    }
    if (!ok){
      alert('Lengkapi jawaban pada langkah ini dulu ya 🙂');
      return;
    }
    if (idx<$steps.length-1) goto(idx+1);
  });
});
