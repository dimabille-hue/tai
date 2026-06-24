<?php
/*
Template Name: Наша деятельность
Description: Шаблон страницы "Наша деятельность" — обзор направлений работы компании.
*/
get_header();
?>
<style>
.tai-template { max-width:1200px; margin:40px auto; padding:24px; }
.tai-activities { display:grid; grid-template-columns: repeat(2, 1fr); gap:20px }
.tai-activity { background:linear-gradient(180deg, #fff, #fbfbfb); padding:18px; border-radius:8px; box-shadow:0 1px 2px rgba(0,0,0,0.04) }
.tai-activity h4{ margin-top:0 }
@media(max-width:900px){ .tai-activities{ grid-template-columns:1fr } }
</style>

<main class="tai-template">
  <h1><?php the_title(); ?></h1>

  <section class="tai-card">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>

    <?php if ( trim(get_the_content()) === '' ) : ?>
    <p>Компания предоставляет комплекс услуг в сфере хранения, транспортировки и аренды площадей под сельскохозяйственную технику и сырьё.</p>

    <div class="tai-activities">
      <article class="tai-activity">
        <h4>Аренда складских помещений</h4>
        <p>Крупные и мелкие склады, гибкие условия аренды и охраняемые территории.</p>
      </article>

      <article class="tai-activity">
        <h4>Открытые площадки</h4>
        <p>Удобные площадки для хранения техники и сельхозпродукции с подъездными путями.</p>
      </article>

      <article class="tai-activity">
        <h4>Логистика и транспорт</h4>
        <p>Организация перевозок по регионам, сопровождение и переработка грузов.</p>
      </article>

      <article class="tai-activity">
        <h4>Сопровождение сделок</h4>
        <p>Юридическая и бухгалтерская поддержка при заключении договоров аренды и поставок.</p>
      </article>
    </div>
    <?php endif; ?>
  </section>
</main>

<?php get_footer();
