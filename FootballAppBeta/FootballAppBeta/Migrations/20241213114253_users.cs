using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace FootballAppBeta.Migrations
{
    /// <inheritdoc />
    public partial class users : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropPrimaryKey(
                name: "PK_GamblingTurns",
                table: "GamblingTurns");

            migrationBuilder.RenameTable(
                name: "GamblingTurns",
                newName: "GamblingTurn");

            migrationBuilder.AddColumn<int>(
                name: "moneyForGambling",
                table: "GamblingTurn",
                type: "int",
                nullable: false,
                defaultValue: 0);

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

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropPrimaryKey(
                name: "PK_GamblingTurn",
                table: "GamblingTurn");

            migrationBuilder.DropColumn(
                name: "moneyForGambling",
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
        }
    }
}
