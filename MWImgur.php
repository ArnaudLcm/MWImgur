<?php

if( !defined( 'MEDIAWIKI' ) ) {
    echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
    die( -1 );
}

class MWImgur {
        public static function onParserFirstCallInit( Parser $parser ) {
                $parser->setHook( 'imgur', [ self::class, 'wfImgurRender' ] );
        }

        public static function wfImgurRender( $input, array $args, Parser $parser, PPFrame $frame ) {
                if ( strtolower($args["thumb"]) == "yes")
                 {
                        return "<div class='imgur-thumb' style='float: right; clear: right;'><a href='https://i.imgur.com/".htmlspecialchars( $input )."'><img width='".htmlspecialchars( $args['w'] )."px' src='https://i.imgur.com/".htmlspecialchars( $input )."'<img></a><p style='line-height:100%;width:".htmlspecialchars( $args['w'] )."px'>".htmlspecialchars( $args["comment"] )."</p></div>";
                 }
                 else
                 {
                        return "<a href='https://i.imgur.com/".htmlspecialchars( $input )."'><img width='".htmlspecialchars( $args['w'] )."px' src='https://i.imgur.com/".htmlspecialchars( $input )."'<img></a>";
                 }

        }
}
