<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Anotações</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('annotations/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite uma palavra-chave ou id da imagem" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>    
	<?=form_close();?>
</div>

<br />

<?php if(isset($q) && !empty($q)) : ?>
<div class="row">
     Foram encontrados <strong><?php echo $total_rows; ?></strong> resultado(s) encontrados para "<em><?php echo $q; ?></em>"
</div>
<?php endif; ?>

<?php if(isset($erro) && !empty($erro)) : ?>
<div class="row">
	<div class="alert alert-danger text-center" role="alert"><?php echo $erro;?></div>
</div>
<?php endif; ?>

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>img_id</th>
          <th>wnid</th>
          <th>Atributos</th>
          <th>Synset</th>
          <th></th>          
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($annotations as $annotation): ?>
        <tr>          
          <td>
          	<a href="<?php echo base_url("annotations/details") . "/" . $annotation->img_id;?>">
          		<?php echo trim($annotation->img_id); ?>
          	</a>          		
          </td>  
           <td>
              <?php echo trim($annotation->wnid); ?>
          </td>
          <td>              
              
              <?php if($annotation->attrs) : ?>
                <a href="<?php echo base_url("annotations/resultado_busca") . "?q=" . $annotation->attrs;?>">
                  <?php echo trim($annotation->attrs); ?>
                </a>
              <?php endif; ?>
          </td>
          <td width="30%">
            <?php if($annotation->Synset()->words != "") : ?>               
              <?php echo $annotation->Synset()->words; ?>
            <?php else: ?>
              ---  
            <?php endif; ?>
          </td>        
          <td>
            <a href="<?php echo base_url("annotations/details") . "/" . $annotation->img_id;?>">
                 <img width="128"  src="<?php echo base_url('imagenet/' . $annotation->filename);?>" />
            </a>
          </td>          
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>