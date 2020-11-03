{**
 * Custom Page Brands Prestashop 1.7
 *
 * @package     Class BrandsJatController
 * @author      Jatniel Guzmán
 * @copyright   2020 Jatniel Guzmán
 * @license     MIT License
 * @link        https://jatnielguzman.com
 * @link        https://twitter.com/jatnielguzman
*}

{extends file='page.tpl'}

{block name='page_header_container'}{/block}

{block name='page_title'}
<span class="sitemap-title">{l s='Nos Marques' d='Shop.Theme'}</span>
{/block}

{block name='page_content'}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">NOS MARQUES</h1>
            <p class="h4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis lacinia massa. Fusce ante
                purus, aliquet eget porttitor ut, sodales in risus. Nunc gravida ipsum id gravida pretium. Praesent
                sodales viverra velit, interdum laoreet ex tempus a. In lacus est, lacinia ac vehicula in, posuere
                ac sapien. Morbi vel luctus purus, in lobortis erat.</p>
            <div class="row">

                {foreach from=$brands item=brand}

                {* BOX BRAND *}

                <div class="col-md-5 mt-md-5 border border-dark mx-auto l-3">

                    <div class="float-left w-50">
                        <img src="{$urls.img_manu_url}{$brand.image}.jpg" class="img-fluid w-75 my-5">
                    </div>
                    
                    <div class="float-right w-50">
                        <h2 class="text-break text-lg-center">{$brand.name}</h2>
                        <p> 
                            {if !empty($brand.short_description)}
                                {$brand.short_description|strip_tags:'UTF-8'|truncate:266:'...'}
                            {else}
                                {$lorem}
                            {/if}
                        </p>
                        <a href="{$brand.link}" class="">Voir tous les produits</a>
                    </div>

                </div>

                {* END BOX BRAND *}

                {/foreach}

            </div>

        </div>
    </div>
</div>
{/block}