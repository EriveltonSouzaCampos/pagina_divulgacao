<?php

function pmxe_wpallexport_info_panel($html){
	$html = <<<EOT

<div id="wpallexport-cta-div"><h5 id="wpallexport-cta-headline">The best group of WordPress folks on the Internet.</h5><div id="wpallexport-cta-text">WP All Import users are some of the most advanced in the industry, working on some of the most interesting projects.<br><br>Discuss, share your work, and learn from the best.<br></div><a id="wpallexport-cta-link" href="https://www.facebook.com/groups/wpallimport" target="_blank">Join the Facebook Group</a></div>

<style>
#wpallexport-cta-link{

    line-height: 1.75;
    word-wrap: break-word;
    box-sizing: border-box;
    touch-action: manipulation;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    text-decoration: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    background-color: #00b3b6;
    padding-top: 6px;
    padding-bottom: 6px;
    border-radius: 5px;
    transition-duration: 0.2s;
    transition-timing-function: ease;
    transition-property: all;
    color: #ffffff;
    font-size: 17px;
    padding-right: 15px;
    padding-left: 15px;
    margin: 0 auto;
    width:100%;
}

#wpallexport-cta-text{

    font-weight: 400;
    color: #02182b;
    word-wrap: break-word;
    box-sizing: inherit;

    line-height: 1.25;
    font-size: 14px;
    padding-bottom: 30px;
    margin: 0 auto;
}

#wpallexport-cta-headline{

    word-wrap: break-word;
    box-sizing: inherit;
    font-weight: 700;
    color: #02182b;
    line-height: 1.3em;
    font-size: 16px;

    padding-bottom: 20px;
    margin: 0 auto;
}

#wpallexport-cta-div{

    line-height: 1.75;
    font-size: 16px;
    font-weight: 400;
    color: #02182b;
    word-wrap: break-word;
    box-sizing: inherit;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items: flex-start;
    background-color: #f9fafc;
    padding-top: 20px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;

    margin-top:10px;

    }
</style>

EOT;

	return $html;
}