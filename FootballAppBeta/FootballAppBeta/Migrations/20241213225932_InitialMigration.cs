using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace FootballAppBeta.Migrations
{
    /// <inheritdoc />
    public partial class InitialMigration : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropPrimaryKey(
                name: "PK_GamblingTurn",
                table: "GamblingTurn");

            migrationBuilder.DropColumn(
                name: "userId",
                table: "GamblingTurn");

            migrationBuilder.RenameTable(
                name: "GamblingTurn",
                newName: "GamblingTurns");

            migrationBuilder.AddPrimaryKey(
                name: "PK_GamblingTurns",
                table: "GamblingTurns",
                column: "Id");

            migrationBuilder.CreateTable(
                name: "Users",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    name = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    balance = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4")
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Users", x => x.Id);
                })
                .Annotation("MySql:CharSet", "utf8mb4");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Users");

            migrationBuilder.DropPrimaryKey(
                name: "PK_GamblingTurns",
                table: "GamblingTurns");

            migrationBuilder.RenameTable(
                name: "GamblingTurns",
                newName: "GamblingTurn");

            migrationBuilder.AddColumn<int>(
                name: "userId",
                table: "GamblingTurn",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddPrimaryKey(
                name: "PK_GamblingTurn",
                table: "GamblingTurn",
                column: "Id");
        }
    }
}
