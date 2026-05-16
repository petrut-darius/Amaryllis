<?php
namespace App\Enums;


enum UserPermissions: string {
    // Users
    case MANAGE_USERS = 'manage:users';
    case CREATE_USERS = 'create:users';
    case UPDATE_USERS = 'update:users';
    case DELETE_USERS = 'delete:users';

    // Baptisms
    case MANAGE_BAPTISMS = 'manage:baptisms';
    case CREATE_BAPTISMS = 'create:baptisms';
    case UPDATE_BAPTISMS = 'update:baptisms';
    case DELETE_BAPTISMS = 'delete:baptisms';

    // Bouquets
    case MANAGE_BOUQUETS = 'manage:bouquets';
    case CREATE_BOUQUETS = 'create:bouquets';
    case UPDATE_BOUQUETS = 'update:bouquets';
    case DELETE_BOUQUETS = 'delete:bouquets';

    // Eighteenths
    case MANAGE_EIGHTEENTHS = 'manage:eighteenths';
    case CREATE_EIGHTEENTHS = 'create:eighteenths';
    case UPDATE_EIGHTEENTHS = 'update:eighteenths';
    case DELETE_EIGHTEENTHS = 'delete:eighteenths';

    // Permissions
    case MANAGE_PERMISSIONS = 'manage:permissions';
    case CREATE_PERMISSIONS = 'create:permissions';
    case UPDATE_PERMISSIONS = 'update:permissions';
    case DELETE_PERMISSIONS = 'delete:permissions';

    // Weddings
    case MANAGE_WEDDINGS = 'manage:weddings';
    case CREATE_WEDDINGS = 'create:weddings';
    case UPDATE_WEDDINGS = 'update:weddings';
    case DELETE_WEDDINGS = 'delete:weddings';
}