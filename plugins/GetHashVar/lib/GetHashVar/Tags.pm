package GetHashVar::Tags;
use strict;
use warnings;

sub _hdlr_key_exists {
    my $value = _hdlr_get_hash_var( @_ );
    if ( $value ) {
        return 1;
    }
    return 0;
}

sub _hdlr_value_exists {
    my $key = _hdlr_get_hash_key( @_ );
    if ( $key ) {
        return 1;
    }
    return 0;
}

sub _hdlr_is_scalar {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return 0;
    my $var = $ctx->stash( 'vars' )->{ $name };
    if ( defined( $var ) ) {
        if ( ref $var ) {
            return 0;
        }
        return 1;
    }
    return 0;
}

sub _hdlr_is_array {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return 0;
    my $var = $ctx->stash( 'vars' )->{ $name };
    if ( defined( $var ) ) {
        if ( ( ref $var ) eq 'ARRAY' ) {
            return 1;
        }
    }
    return 0;
}

sub _hdlr_is_hash {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return 0;
    my $var = $ctx->stash( 'vars' )->{ $name };
    if ( defined( $var ) ) {
        if ( ( ref $var ) eq 'HASH' ) {
            return 1;
        }
    }
    return 0;
}

sub _hdlr_in_array {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $value = $args->{ 'value' };
    if (! $value ) {
        $value = $args->{ 'var' } || return '';
    }
    my $array = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $array ) eq 'ARRAY' ) {
        if ( grep( /^$value$/, @$array ) ) {
            return 1;
        }
    }
    return 0;
}

sub _hdlr_get_array_var {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $num = $args->{ 'num' };
    my $index = $args->{ 'index' };
    if ( (! defined( $index ) ) && (! $num ) ) {
        return '';
    }
    my $array = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $array ) eq 'ARRAY' ) {
        if ( $num ) {
            $index = $num - 1;
        }
        return @$array[ $index ];
    }
}

sub _hdlr_get_hash_var {
    my ( $ctx, $args, $cond ) = @_;
    my $key = $args->{ 'key' } || return '';
    my $name = $args->{ 'name' } || return '';
    my $hash = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $hash ) eq 'HASH' ) {
        if ( ( ref $key ) && ( ( ref $key ) eq 'ARRAY' ) ) {
            my $value = $hash;
            for my $_key ( @$key ) {
                $value = $value->{ $_key };
            }
            return $value;
        }
        return $hash->{ $key };
    }
    return '';
}

sub _hdlr_get_hash_key {
    my ( $ctx, $args, $cond ) = @_;
    my $value = $args->{ 'value' };
    if (! $value ) {
        $value = $args->{ 'var' } || return '';
    }
    my $name = $args->{ 'name' } || return '';
    my $hash = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $hash ) eq 'HASH' ) {
        for my $key ( keys %$hash ) {
            if ( $hash->{ $key } eq $value ) {
                return $key;
                last;
            }
        }
    }
    return '';
}

sub _hdlr_array_join {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $glue  = $args->{ 'glue ' } || '';
    my $array = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $array ) eq 'ARRAY' ) {
        return join( $glue, $array );
    }
    return '';
}

sub _hdlr_array_rand {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $array = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $array ) eq 'ARRAY' ) {
        my $count = @$array; 
        my $num = int( rand( $count ) );
        return @$array[ $num ];
    }
}

sub _hdlr_split_var {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $glue = $args->{ 'glue' } || ',';
    my $var = $ctx->stash( 'vars' )->{ $name };
    if (! $var ) {
        $var = $args->{ var };
    }
    if ( $var ) {
        my @vars = split( /$glue/, $var );
        $ctx->stash( 'vars' )->{ $name } = \@vars;
    }
    return '';
}

sub _hdlr_array_shuffle {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $var = $ctx->stash( 'vars' )->{ $name };
    if (! $var ) {
        return '';
    }
    eval "require List::Util;";
    unless ( $@ ) {
        my @vars = List::Util::shuffle( @$var );
        $ctx->stash( 'vars' )->{ $name } = \@vars;
    }
    return '';
}

sub _hdlr_array_reverse {
    my ( $ctx, $args, $cond ) = @_;
    my $name = $args->{ 'name' } || return '';
    my $var = $ctx->stash( 'vars' )->{ $name };
    if (! $var ) {
        return '';
    }
    my @vars = reverse( @$var );
    $ctx->stash( 'vars' )->{ $name } = \@vars;
    return '';
}

sub _filter_json2vars {
    my ( $json, $name, $ctx ) = @_;
    my $array = MT::Util::from_json( $json );
    $ctx->stash( 'vars' )->{ $name } = $array;
    return '';
}

sub _filter_vars2json {
    my ( $array, $arg, $ctx ) = @_;
    return MT::Util::to_json( $array );
}

sub _filter_mtignore {
    return '';
}

1;