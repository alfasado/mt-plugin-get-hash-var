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
    my $num = $args->{ 'num' } || return '';
    my $array = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $array ) eq 'ARRAY' ) {
        $num--;
        return @$array[ $num ];
    }
}

sub _hdlr_get_hash_var {
    my ( $ctx, $args, $cond ) = @_;
    my $key = $args->{ 'key' } || return '';
    my $name = $args->{ 'name' } || return '';
    my $hash = $ctx->stash( 'vars' )->{ $name };
    if ( ( ref $hash ) eq 'HASH' ) {
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

1;