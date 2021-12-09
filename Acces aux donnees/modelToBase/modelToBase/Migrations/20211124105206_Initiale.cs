using Microsoft.EntityFrameworkCore.Migrations;
using MySql.EntityFrameworkCore.Metadata;

namespace modelToBase.Migrations
{
    public partial class Initiale : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Departement",
                columns: table => new
                {
                    IdDepartement = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySQL:ValueGenerationStrategy", MySQLValueGenerationStrategy.IdentityColumn),
                    Libelle = table.Column<string>(type: "varchar(50)", maxLength: 50, nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Departement", x => x.IdDepartement);
                });

            migrationBuilder.CreateTable(
                name: "Ville",
                columns: table => new
                {
                    IdVille = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySQL:ValueGenerationStrategy", MySQLValueGenerationStrategy.IdentityColumn),
                    Libelle = table.Column<string>(type: "varchar(50)", maxLength: 50, nullable: false),
                    DepartementIdDepartement = table.Column<int>(type: "int", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Ville", x => x.IdVille);
                    table.ForeignKey(
                        name: "FK_Ville_Departement_DepartementIdDepartement",
                        column: x => x.DepartementIdDepartement,
                        principalTable: "Departement",
                        principalColumn: "IdDepartement",
                        onDelete: ReferentialAction.Restrict);
                });

            migrationBuilder.CreateIndex(
                name: "IX_Ville_DepartementIdDepartement",
                table: "Ville",
                column: "DepartementIdDepartement");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Ville");

            migrationBuilder.DropTable(
                name: "Departement");
        }
    }
}
