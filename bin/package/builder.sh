
version=1.0.0

function cleanAndPackage()
{
    cp -Rf src/woocommerce_hipayenterprise_data bin/package/
    cd bin/package/

    ############################################
    #####          CLEAN IDEA FILE           ####
    ############################################
    if [ -d hipay_enterprise/nbproject ]; then
        rm -R woocommerce_hipayenterprise_data/nbproject
    fi

    if [ -d hipay_enterprise/.idea ]; then
        rm -R woocommerce_hipayenterprise_data/.idea
    fi

    find woocommerce_hipayenterprise_data/ -type d -exec cp index.php {} \;

    zip -r hipay-enterprise-sdk-woocommerce-data-$version.zip woocommerce_hipayenterprise_data
    rm -R woocommerce_hipayenterprise_data
}

function show_help()
{
	cat << EOF
Usage: $me [options]
options:
    -h, --help                        Show this help
    -v, --version                     Configure version for package
EOF
}

function parse_args()
{
	while [[ $# -gt 0 ]]; do
		opt="$1"
		shift

		case "$opt" in
			-h|\?|--help)
				show_help
				exit 0
				;;
				esac
		case "$opt" in
			-v|--version)
              	version="$1"
				shift
				;;
		    esac
	done;
}

function main()
{
	parse_args "$@"
	cleanAndPackage
}

main "$@"
